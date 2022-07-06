<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\myactivities\basic
 * @category   CategoryName
 */

namespace open20\amos\myactivities\basic;

/**
 * Class RequestToJoinOrganizzazioniForReferees
 * @package open20\amos\myactivities\basic
 */
class RequestToJoinOrganizzazioniForReferees extends \open20\amos\organizzazioni\models\ProfiloUserMm implements MyActivitiesModelsInterface
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
     * @return \open20\amos\organizzazioni\models\ProfiloUserMm
     */
    public function getWrappedObject()
    {
        return \open20\amos\organizzazioni\models\ProfiloUserMm::findOne($this->id);
    }
}
