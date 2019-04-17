<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\myactivities\basic
 * @category   CategoryName
 */

namespace lispa\amos\myactivities\basic;

/**
 * Interface MyActivitiesModelsInterface
 * @package lispa\amos\myactivities\basic
 */
interface MyActivitiesModelsInterface
{
    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @return string
     */
    public function getCreatorNameSurname();

    /**
     * @return string
     */
    public function getSearchString();

    /**
     * @return \lispa\amos\core\record\Record
     */
    public function getWrappedObject();
}
