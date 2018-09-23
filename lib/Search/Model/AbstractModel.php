<?php

namespace Scooter\Search\Model;

abstract class AbstractModel implements \JsonSerializable
{
    abstract protected function prepare();

    public function jsonSerialize()
    {
        $data = $this->prepare();

        if (null === $data) {
            return null;
        }

        $data = array_filter($data, function ($var) {
            if (null === $var) {
                return false;
            }

            if ($var instanceof AbstractModel) {
                if ($var->jsonSerialize() === null) {
                    return false;
                }
            }

            return true;
        });

        if (0 === count($data)) {
            return null;
        }

        return $data;
    }
}
