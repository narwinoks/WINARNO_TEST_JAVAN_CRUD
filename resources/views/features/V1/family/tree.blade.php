@extends('templates.main')
@section('content')
    <div class="mt-5">
        <div id="family-tree"></div>
    </div>
@endsection
@push('scripts')
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script>
        // Fungsi untuk membangun tree silsilah
        function buildFamilyTree(data, container) {
            const treeLayout = d3.tree().size([600, 400]);
            const nodes = d3.hierarchy(data);
            nodes.descendants().forEach((d) => (d.y = d.depth * 100));
            const svg = d3
                .select(container)
                .append("svg")
                .attr("width", 800)
                .attr("height", 600)
                .append("g")
                .attr("transform", "translate(50, 50)");
            const links = svg
                .selectAll(".link")
                .data(treeLayout(nodes).links())
                .enter()
                .append("path")
                .attr("class", "link")
                .attr("d", d3.linkVertical().x((d) => d.x).y((d) => d.y));
            const nodesGroup = svg
                .selectAll(".node")
                .data(nodes.descendants())
                .enter()
                .append("g")
                .attr("class", (d) => "node" + (d.children ? " node--internal" : " node--leaf"))
                .attr("transform", (d) => `translate(${d.x},${d.y})`);
            nodesGroup
                .append("circle")
                .attr("r", 10)
                .style("fill", "steelblue");
            nodesGroup
                .append("text")
                .attr("dy", "0.31em")
                .attr("x", (d) => (d.children ? -20 : 20))
                .style("text-anchor", (d) => (d.children ? "end" : "start"))
                .text((d) => d.data.name);
        }

        // Mengambil data keluarga dari API JSON
        fetch('/api/V1/tree')
            .then((response) => response.json())
            .then((familyData) => {
                // Memanggil fungsi untuk membangun tree silsilah dengan data dari API JSON
                buildFamilyTree(familyData[0], "#family-tree");
            })
            .catch((error) => console.error('Error fetching family data:', error));
    </script>
@endpush

