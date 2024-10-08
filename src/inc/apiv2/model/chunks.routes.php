<?php
use DBA\Factory;

use DBA\Chunk;

require_once(dirname(__FILE__) . "/../common/AbstractModelAPI.class.php");


class ChunkAPI extends AbstractModelAPI {
    public static function getBaseUri(): string {
      return "/api/v2/ui/chunks";
    }

    public static function getAvailableMethods(): array {
      return ['GET'];
    }

    public static function getDBAclass(): string {
      return Chunk::class;
    }   

    public function getExpandables(): array {
      return ["task"];
    }

    protected function doExpand(object $object, string $expand): mixed {
      assert($object instanceof Chunk);
      switch($expand) {
        case 'task':
          $obj = Factory::getTaskFactory()->get($object->getTaskId());
          return $this->obj2Array($obj);
      }
    }  

    protected function createObject(array $data): int {
      /* Dummy code to implement abstract functions */
      assert(False, "Chunks cannot be created via API");
      return -1;
    }

    public function updateObject(object $object, array $data, array $processed = []): void {
      assert(False, "Chunks cannot be updated via API");
    }

    protected function deleteObject(object $object): void {
      /* Dummy code to implement abstract functions */
      assert(False, "Chunks cannot be deleted via API");
    }
}

ChunkAPI::register($app);