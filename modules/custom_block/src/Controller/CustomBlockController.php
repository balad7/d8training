<?php
namespace Drupal\custom_block\Controller;

class CustomBlockController {
    public function hello() {
        return array(
                '#title' => 'Hello World!',
                '#markup' => 'Here is some content.',
            );
    }
}
