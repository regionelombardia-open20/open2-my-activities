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
 * Class RequestToJoinOrganizzazioniForReferees
 * @package lispa\amos\myactivities\basic
 */
class RequestToJoinOrganizzazioniForReferees extends \lispa\amos\organizzazioni\models\ProfiloUserMm implements MyActivitiesModelsInterface
{
    /**
     * @return string
     */
    public function getSearchString()
    {
        return ((!is_null($this->user) && !is_null($this->user->userProfile)) ? $this->user->userProfile->getNomeCognome() : '');
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return string
     */
    public function getCreatorNameSurname()
    {
        return (!is_null($this->createdUserProfile) ? $this->createdUserProfile->getNomeCognome() : '');
    }

    /**
     * @return \lispa\amos\organizzazioni\models\ProfiloUserMm
     */
    public function getWrappedObject()
    {
        return \lispa\amos\organizzazioni\models\ProfiloUserMm::findOne($this->id);
    }
}
