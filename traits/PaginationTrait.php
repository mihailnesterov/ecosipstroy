<?php 

namespace app\traits;

use Yii;
use yii\data\Pagination;

/**
 * Pagination's Trait
 */
trait PaginationTrait {

    /**
     * Gets gallery paged list.
     *
     * @return \yii\db\ActiveQuery
     */
    public static function getPagedList($query)
    {
        $pagination = self::getPagination($query);

        return $query->offset($pagination->offset)->limit($pagination->limit)->all();
    }

    /**
     * Gets gallery pagination.
     *
     * @param \yii\db\ActiveQuery $query
     * @return mixed
     */
    public static function getPagination($query)
    {
        $countQuery = clone $query;
        $perPage = Yii::$app->request->get('per-page');
        return new Pagination([
            'totalCount' => $countQuery->count(), 
            'pageSize' => $perPage ? $perPage : Yii::$app->params['pagination']['pageSize']
        ]);
    }

}