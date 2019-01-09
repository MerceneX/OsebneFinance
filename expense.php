<?php
  session_start();
  require 'includes.php';
  redirectUnlogged();
?>
<h1>.</h1>
<div class="container">
  <h2>New Expense</h2>
  <hr/>
  <form action="accCreate.php" method="post">
    <div class="form-group">
      <label for="sumInput">Sum:</label>
      <input validate step="0.01" type="number" class="form-control" name="sumInput" id="sumInput" placeholder="">
    </div>
    <div class="form-group">
      <label for="necessaryInput">Necessary:</label>
      <select required class="form-control" name="necessaryInput" id="necessaryInput">
        <option>Yes</option>
        <option>No</option>
      </select>
    </div>
    <div class="form-group">
      <label for="timeInput">Time:</label>
      <input required type="text" class="form-control" name="timeInput" id="timeInput" value=<?php echo date("h:i:s");?>>
    </div>
    <div class="form-group">
      <label for="dateInput">Date:</label>
      <input required type="text" class="form-control" name="dateInput" id="dateInput" value=<?php echo date('Y-m-d');?>>
    </div>
    <button type="submit" class="btn btn-primary">Add Expense</button>
  </form>
</div>
<?php
  require 'footer.php';
?>
<script>

</script>