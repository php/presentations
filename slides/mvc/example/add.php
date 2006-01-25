<?php
  include './ui.inc';    // Common View Helper functions
  include './add_c.inc'; // Controller
  head();
?>
  <div id="tItems" class="ta">
   <table cellspacing="0" cellpadding="3" width="100%">
<?php foreach($items as $i=>$elem) {
        $price = number_format($elem['price'],2);
        $s = $i%2;
        echo <<<EOB
    <tr class="it$s" 
        onmouseover="this.className='its';"
        onmouseout="this.className='it$s';"
        onclick="postData('add.php','formName=fItem&load_item={$elem['id']}');">
        <td>{$elem['id']}</td>
        <td>{$elem['sdesc']}</td>
        <td>{$elem['cat']}</td>
        <td align="right">\$$price</td>
    </tr>

EOB;
      }
?>
   </table>
  </div><br />
  <form name="fItem" action="javascript:postForm('add.php','fItem')">
    <input type="hidden" name="formName" value="fItem" />
    <input type="hidden" id="f_id" name="id" value="" />
    <?php field('Short Description','sdesc','text',$item, array('size'=>39))?>
    <?php field('Category','cat','select',$item,array('options'=>$categories))?>
    <?php field('Price','price','text',$item,array('size'=>8,'dir'=>'RTL'))?>
    <br />
    <?php field('Details','ldesc','textarea',$item)?><br />
    <input name="f_submit" type="submit" value="Add Item" />
    <input type="reset" value="Clear" />
  </form>
<?php
  foot();
?>
