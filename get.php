<html>
<body>
<?php   
    $value="abc";   
?>  
<script type="text/javascript">   
    var value = "<?echo $value;?>";   
</script> 
<script type="text/javascript">   
function express(){   
    var value="abc";   
    location.href="test.php?value=" value;   
}  
</script>
<?php   
    echo $_GET['value'];   
?>  