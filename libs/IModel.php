<?php
interface IModel{
    function save();
    function update();
    function delete($id);
    function getAll();
    function get($id);

}
?>