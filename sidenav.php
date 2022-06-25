<div class="row bg-light p-3 navv p-2">
  <div class="col-lg-5 text-truncate"> 
    <?php include('name.php')?>
  </div>
  <div class="col-lg-6 p-2">
    <form class="d-flex flex-row" action="search.php"  method="GET">
      <input class="form-control flex-grow-1 rounded-0" type="text" name="search" placeholder="Search for datas &amp; reports...">
        <button class="btn rounded-0 btn-primary" type="submit" value="Searching" name="go">
          Search
        </button>
    </form>
  </div>
</div>
<div class="d-flex bg-white flex-row p-3 shadow-sm">
  <div class="flex-grow-1  pl-2">
    <a href="index.php" class="btn btn-outline-default border linked mt-2">Home</a>
    <a href="import.php" class="btn btn-outline-default border linked mt-2">Import</a>
    <a href="export.php" class="btn btn-outline-default border linked mt-2">Export</a>
    <a href="category.php" class="btn btn-outline-default border linked mt-2">Category</a>
    <a href="stockmanage.php" class="btn btn-outline-default border linked mt-2">Stock Overview
    </a>
    <a href="report.php" class="btn btn-outline-default border linked mt-2">Report
    </a>
    <a href="setting.php" class="btn btn-outline-default border linked mt-2">Setting
    </a>
  </div>
  <div class="p-2 "> 
    <?php include('logout.php')?>
  </div> 
</div>

 

