<?php namespace VaahCms\Modules\Subject\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use WebReinvent\VaahCms\Models\TaxonomyType as TaxonomyTypeBase;

class TaxonomyType extends TaxonomyTypeBase {


  protected $table = 'vh_taxonomy_types';

  //-------------------------------------------------
  public function children(): HasMany
  {
      return $this->hasMany(self::class,
          'parent_id', 'id')
          ->with(['children'])
          ->select('id', 'id as key', 'name as label', 'slug as data', 'parent_id');
  }
  //-------------------------------------------------


}
