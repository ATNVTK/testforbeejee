<?php

namespace Models;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;

/**
 * @Entity(
 *    table = "task",
 *    role = "task",
 * )
 */

class Task extends BaseModel
{
    /** @Column(type="primary") */
    public $id;

    /** @Column(type="string") */
    public $user_name;

    /** @Column(type="string") */
    public $email;

    /** @Column(type="text") */
    public $text;

    /** @Column(type="int(3)") */
    public $status_id;

    /** @Column(type="int(1)") */
    public $is_updated;

}
