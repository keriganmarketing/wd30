<?php

function create($class, $options = [])
{
    return factory($class)->create($options);
}

function make($class, $options = [])
{
    return factory($class)->make($options);
}
