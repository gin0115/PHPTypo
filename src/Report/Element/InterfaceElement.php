<?php

/**
 * Interface report element.
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

declare(strict_types=1);

namespace Gin0115\PHPTypo\Report\Element;

use Gin0115\PHPTypo\Report\Element\AbstractElement;

class InterfaceElement extends AbstractElement
{
    /**@inheritDoc */
    public function getType(): string
    {
        return 'interface';
    }
}
