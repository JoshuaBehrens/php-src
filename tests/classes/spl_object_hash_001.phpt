--TEST--
spl_object_hash invalidates without gc
--FILE--
<?php

class BigClass {
    private string $a = '608d5829-325f-4516-9bb2-96e2b4655328';
    private string $b = '953d8dd5-bb27-43e9-bf76-ffc9a749ba81';
    private string $c = '3d4aede2-17df-4e61-9147-3720020d0706';
    private string $d = 'bd34d7f4-ee58-439e-b1cb-1912a561afb3';
    private string $e = '26639ea8-a582-4e40-9bbb-153c292ba8c9';
    private string $f = 'f14e884e-7c7e-4be9-8de3-e94f6d0a080d';
    private string $g = '8ef85196-0d28-4d9e-b2b7-2c0724a3b725';
    private string $h = '75cea0f8-cca2-4534-8746-6ffcb135bf0c';
    private string $i = 'f325c9e2-31a5-46f2-90bf-374a3ed3926b';
    private string $j = 'b7ece470-9de8-43c2-b3b2-06e0f7dd8ac3';
    private string $k = '6a7f05c3-ef93-423c-8438-bebd806f3cac';
    private string $l = 'eee66bd1-f196-4e36-b7e8-b37c8d295007';
    private string $m = 'b194ffc2-b704-444a-ac62-74e4c9c53aa5';
    private string $n = 'b2afd0b9-1ec3-4b82-bbff-3ef236b58ed9';
    private string $o = '8eecc9f9-494f-4ccf-9700-305fb0f35fb3';
    private string $p = '08db01f0-79a4-4c0c-ac18-6460926e4e8f';
    private string $q = '23373dd4-9328-43a6-93f6-41e5ad24fb38';
    private string $r = 'ac5321b7-167d-4a23-9c98-b80083870c7e';
    private string $s = 'd6f47e32-73d4-4039-9921-3a197c672b9b';
    private string $t = '32afd6df-0015-4b77-81af-a3675ad55b6c';
    private string $u = 'a345b692-e4fa-4810-ac89-b8157645698b';
    private string $v = '8bca11c6-b3da-463e-b329-3751817a0353';
    private string $w = 'a0e43a75-4cfc-48d6-ac1f-fb5411668581';
    private string $x = '86addab0-2719-4ae9-977c-b5ce2ed5de5f';
    private string $y = '4a574979-5c90-4804-b1e8-a1511be9c864';
    private string $z = 'c8632697-cc9b-4690-a9c0-3787b77436e1';
}

$storage = [];

for ($c = 0; $c < PHP_INT_MAX - 10; $c++) {
    foreach ($storage as $hash => $obj) {
        if ($hash !== spl_object_hash($obj)) {
            echo "Fail";
            exit(0);
        }
    }

    for ($i = 0; $i < 1000; $i++) {
        $object = new BigClass();
        $storage[spl_object_hash($object)] = $object;
    }
}

echo "Success";

?>
===DONE===
--EXPECT--
Success
===DONE===
