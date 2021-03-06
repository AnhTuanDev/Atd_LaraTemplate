<?php

declare(strict_types=1);

//namespace Orchid\Screen\Layouts;
namespace App\Orchid\Atd\Screen\Layouts;

use Orchid\Screen\Layout;
//use App\Orchid\Atd\Support\Facades\AtdLayout as Layout;
use Orchid\Screen\Repository;

/**
 * Class Columns.
 */
abstract class AtdColumns extends Layout
{
    /**
     * @var string
     */
    //protected $template = 'platform::layouts.columns';
    protected $template = 'orchid.layouts.columns';

    /**
     * Layout constructor.
     *
     * @param Layout[] $layouts
     */
    public function __construct(array $layouts = [])
    {
        $this->layouts = $layouts;
    }

    /**
     * @param Repository $repository
     *
     * @return mixed
     */
    public function build(Repository $repository)
    {
        return $this->buildAsDeep($repository);
    }
}
