<?php

namespace Fenom;

class Smarty extends \Fenom {
    use StorageTrait;
    use EntityLoaderTrait;
    use FSEntityLoaderTrait;
    use SmartyFallbackTrait;
}