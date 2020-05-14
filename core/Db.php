<?php

namespace core;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Models\Task;
use Spiral\Database;
use Cycle\ORM;
use Cycle\Schema;
use Cycle\Annotated;
use Doctrine\Common\Annotations\AnnotationRegisty;

class Db
{
    public static $orm;

    public function __construct()
    {
        $dbManager = new Database\DatabaseManager(
            new Database\Config\DatabaseConfig([
                'default'     => 'default',
                'databases'   => [
                    'default' => ['connection' => 'mysql']
                ],
                'connections' => [
                    'mysql'     => [
                        'driver'  => Database\Driver\MySQL\MySQLDriver::class,
                        'options' => [
                            'connection' => 'mysql:host=127.0.0.1;dbname=test',
                            'username'   => 'root',
                            'password'   => '12345678',
                        ]
                    ],
                ]
            ])
        );
        $finder = (new \Symfony\Component\Finder\Finder())->files()->in([__DIR__ . '/../models']); // __DIR__ here is folder with entities
        $classLocator = new \Spiral\Tokenizer\ClassLocator($finder);
        AnnotationRegistry::registerLoader('class_exists');

        $schema = (new Schema\Compiler())->compile(new Schema\Registry($dbManager), [
            new Schema\Generator\ResetTables(),       // re-declared table schemas (remove columns)
            new Annotated\Embeddings($classLocator),  // register embeddable entities
            new Annotated\Entities($classLocator),    // register annotated entities
            new Annotated\MergeColumns(),             // add @Table column declarations
            new Schema\Generator\GenerateRelations(), // generate entity relations
            new Schema\Generator\ValidateEntities(),  // make sure all entity schemas are correct
            new Schema\Generator\RenderTables(),      // declare table schemas
            new Schema\Generator\RenderRelations(),   // declare relation keys and indexes
            new Annotated\MergeIndexes(),             // add @Table column declarations
            new Schema\Generator\SyncTables(),        // sync table changes to database
            new Schema\Generator\GenerateTypecast(),  // typecast non string columns
        ]);
        $orm = new ORM\ORM(new ORM\Factory($dbManager));
        self::$orm = $orm->withSchema(new ORM\Schema($schema));

        //(new ORM\Transaction(self::$orm))->persist($task)->run();
    }

}