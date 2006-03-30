<?php
  include './ui.inc';    // Common View Helper functions
  include './add_c.inc'; // Controller
  head();
?>
  <div id="tItems" class="ta">
   <table cellspacing="0" cellpadding="3" width="100%">
<?php foreach($items as $i=>$elem) {
        $s = $i%2;
        echo <<<EOB
    <tr id="{$elem['id']}" class="it$s">
        <td>{$elem['id']}</td>
        <td>{$elem['sdesc']}</td>
        <td>{$elem['cat']}</td>
        <td align="right">\${$elem['fprice']}</td>
    </tr>

EOB;
      }
?>
   </table>
  </div><br />
  <form name="fItem" action="javascript:postForm('add.php','fItem')">
    <input type="hidden" name="formName" value="fItem" />
    <input type="hidden" name="id" id="f_id" value="" />
    <input type="text" class="f" id="f_sdesc" name="sdesc" size="39" 
           maxlength="128" value="Short Description" dir="LTR" />
    <select class="f" name="cat" id="f_cat" size="1">
      <option selected>Category</option>
<?php foreach($categories as $cat) echo <<<EOB
      <option value="{$cat}">{$cat}</option>

EOB;
?>
    </select>
    <input type="text" class="f" id="f_price" name="price" size="8"
           maxlength="128" value="Price" dir="RTL" /><br />
    <textarea style="width: 100%" name="ldesc" class="f" 
              id="f_ldesc" rows="5" wrap="soft">Details</textarea><br />
    <input name="f_submit" type="submit" value="Add Item" />
    <input type="reset" value="Clear" />
  </form>
<?php
  foot();
?>
