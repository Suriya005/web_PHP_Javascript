<?php include 'header.php' ?>
<style>
.itemx{
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 12rem;
  padding: 1rem;
  
}
.itemx span{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  border-radius:1rem;
  box-shadow: 0 0 1rem rgba(0,0,0,0.3);
  font-size: 1.5rem;
  font-weight: bold;
  text-align: center;
}
</style>
<!-- Content Wrapper. Contains page content -->
<!-- *********************************************************************************************************************************** -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-4 itemx" ><span id="txn_date" class="bg-info"></span></div>
      <div class="col-sm-4 itemx"><span id="new_case" class="bg-warning"></span></div>
      <div class="col-sm-4 itemx"><span id="total_case" class="bg-danger"></span></div>
    </div>
  </div>



  <div class="col-sm-12">
    <canvas id="myChart" width="100%" height="500px"></canvas>
  </div>


</div>
<!-- /.content-wrapper -->
<!-- **************************************************************************************************************************************************************** -->


<script src="script.js"></script>
<!-- Axios -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<?php include 'footer.php' ?>