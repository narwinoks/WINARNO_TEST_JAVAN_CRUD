@extends('templates.main')
@section('content')
    <div class="mt-5">
        <div id="family-tree"></div>
    </div>
@endsection
@push('scripts')
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script>
        // Data keluarga (contoh)
        const familyData = {
            name: "Kakek",
            children: [
                {
                    name: "Ayah",
                    children: [
                        {
                            name: "Anak 1"
                        },
                        {
                            name: "Anak 2"
                        }
                    ]
                },
                {
                    name: "Bibi"
                }
            ]
        };

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

        // Memanggil fungsi untuk membangun tree silsilah
        buildFamilyTree(familyData, "#family-tree");
    </script>
@endpush
{{--@push('scripts')--}}
{{--    <script src="https://d3js.org/d3.v6.min.js"></script>--}}
{{--    <script>--}}
{{--        // Ambil data dari server menggunakan AJAX, atau Anda bisa hardcode datanya langsung di sini--}}
{{--        // Misalnya, Anda dapat mengambil data dari API yang Anda buat pada langkah nomor 10.--}}
{{--        const familyData = [--}}
{{--            { id: 1, name: 'Budi', gender: 'Laki-laki', parent_id: null },--}}
{{--            { id: 2, name: 'Farah', gender: 'Perempuan', parent_id: 1 },--}}
{{--            { id: 3, name: 'Hani', gender: 'Perempuan', parent_id: 1 },--}}
{{--            { id: 4, name: 'Dina', gender: 'Perempuan', parent_id: 1 },--}}
{{--            { id: 5, name: 'Eko', gender: 'Laki-laki', parent_id: 1 },--}}
{{--            { id: 6, name: 'Rudi', gender: 'Laki-laki', parent_id: 1 },--}}
{{--            { id: 6, name: 'Rudi', gender: 'Laki-laki', parent_id: 2 },--}}
{{--        ];--}}

{{--        // Membuat tree dengan D3.js--}}
{{--        const svg = d3.select('#family-tree').append('svg')--}}
{{--            .attr('width', 400)--}}
{{--            .attr('height', 200);--}}

{{--        const root = d3.stratify()--}}
{{--            .id((d) => d.id)--}}
{{--            .parentId((d) => d.parent_id)--}}
{{--            (familyData);--}}

{{--        const treeLayout = d3.tree().size([300, 150]);--}}
{{--        const treeData = treeLayout(root);--}}

{{--        const links = treeData.links();--}}
{{--        const nodes = treeData.descendants();--}}

{{--        const link = svg.selectAll('.link')--}}
{{--            .data(links)--}}
{{--            .enter().append('path')--}}
{{--            .attr('class', 'link')--}}
{{--            .attr('d', d3.linkVertical()--}}
{{--                .x((d) => d.x)--}}
{{--                .y((d) => d.y));--}}

{{--        const node = svg.selectAll('.node')--}}
{{--            .data(nodes)--}}
{{--            .enter().append('g')--}}
{{--            .attr('class', 'node')--}}
{{--            .attr('transform', (d) => `translate(${d.x},${d.y})`);--}}

{{--        node.append('circle')--}}
{{--            .attr('r', 4.5);--}}

{{--        node.append('text')--}}
{{--            .attr('dy', '.35em')--}}
{{--            .attr('x', (d) => (d.children ? -13 : 13))--}}
{{--            .style('text-anchor', (d) => (d.children ? 'end' : 'start'))--}}
{{--            .text((d) => d.data.name);--}}
{{--    </script>--}}

{{--@endpush--}}
