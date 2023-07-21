<?php

namespace App\Interface\V1;

interface FamilyInterface
{
  public  function getAllDataFamily();
  public  function store($data);
  public  function show($id);
    public  function update($olData,$newData);

    public  function delete($data);
    public  function getAllDataFamilyPaginate();
}
