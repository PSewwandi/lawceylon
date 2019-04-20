<?php
    function cmp($a, $b)
    {
        return strcmp($a->name, $b->name);
    }
?>
<?php  $i=0; ?>
<?php foreach ($markers as $mark): ?>
    <?php 
    $data[$i++]=$mark;
    ?>
<?php endforeach; ?>

<?php usort($data,"cmp"); ?>

<ul>
    <?php foreach ($data as $d): ?>
    <li><a href="\lawfirms\{{$d->name}}"><font size="4.7"> <?=$d->name; ?></a></font> </li>
    <?php endforeach; ?>
</ul>