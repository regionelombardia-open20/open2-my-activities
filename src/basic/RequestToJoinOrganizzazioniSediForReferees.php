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
 * Class RequestToJoinOrganizzazioniSediForReferees
 * @package lispa\amos\myactivities\basic
 */
class RequestToJoinOrganizzazioniSediForReferees extends \lispa\amos\organizzazioni\models\ProfiloSediUserMm implements MyActivitiesModelsInterface
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
     * @return \lispa\amos\organizzazioni\models\ProfiloSediUserMm
     */
    public function getWrappedObject()
    {
        return \lispa\amos\organizzazioni\models\ProfiloSediUserMm::findOne($this->id);
    }
}
