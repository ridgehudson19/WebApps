<script>
	function goBack() {
	history.go(-1);
	return false;
}
</script>

<div id = "menubutton">
  <form>
	 <button type="submit" onclick="goBack(); return false;"><< Go Back</button>
  </form>
  </div>
