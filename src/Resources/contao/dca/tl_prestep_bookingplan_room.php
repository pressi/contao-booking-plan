<?php
/*******************************************************************
 * (c) 2019 Stephan Preßl, www.prestep.at <development@prestep.at>
 * All rights reserved
 * Modification, distribution or any other action on or with
 * this file is permitted unless explicitly granted by PRESTEP
 * www.prestep.at <development@prestep.at>
 *******************************************************************/

$strTableName = 'tl_prestep_bookingplan_room';

$GLOBALS['TL_DCA'][ $strTableName ] = array(
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => true
    ),


    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 4,
            'flag'                    => 2,
            'fields'                  => array('title'),
            'headerFields'            => array('title','language','tstamp'),
            'panelLayout'             => 'filter;sort,search,limit',
            'child_record_class'      => 'no_padding'
        ),


        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            ),
        ),


        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG'][ $strTableName ]['edit'],
                'href'                => 'table=tl_content',
                'icon'                => 'edit.svg'
            ),
            'editheader' => array
            (
                'label'               => &$GLOBALS['TL_LANG'][ $strTableName ]['editmeta'],
                'href'                => 'act=edit',
                'icon'                => 'header.svg'
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG'][ $strTableName ]['copy'],
                'href'                => 'act=paste&amp;mode=copy',
                'icon'                => 'copy.svg'
            ),
            'cut' => array
            (
                'label'               => &$GLOBALS['TL_LANG'][ $strTableName ]['cut'],
                'href'                => 'act=paste&amp;mode=cut',
                'icon'                => 'cut.svg'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG'][ $strTableName ]['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.svg',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'toggle' => array
            (
                'label'               => &$GLOBALS['TL_LANG'][ $strTableName ]['toggle'],
                'icon'                => 'visible.svg',
                'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
                'button_callback'     => array('prestep.bookingplan.room.dca.tl_prestep_bookingplan_room', 'toggleIcon')
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG'][ $strTableName ]['show'],
                'href'                => 'act=show',
                'icon'                => 'show.svg'
            )
        )
    ),
    // Palettes
    'palettes' => array
    (
        '__selector__'                => array('published'),
        'default'                     => '{title_legend},title,alias;{teaser_legend},description;{publish_legend},published',
    ),
    'subpalettes' => array
    (
        'published'           => 'start,stop'
    ),
    // Fields
    'fields' => array
    (
        // Achtung, keine Einträge mehr, in denen lediglich 'sql' => '' Einträge vorkamen!
        // ID, tstamp befinden sich in der Entity "Entity\Room.php"
        'title' => array
        (
            'label'                   => &$GLOBALS['TL_LANG'][ $strTableName ]['title'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'filter'                  => true,
            'sorting'                 => true,
            'eval'                    => array('mandatory'=>true,'maxlength'=>255,'tl_class'=>'w50','gsIgnore'=>true),
        ),
        'alias' => array
        (
            'label'                   => &$GLOBALS['TL_LANG'][ $strTableName ]['alias'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'search'                  => true,
            'eval'                    => array('rgxp'=>'alias','doNotCopy'=>true,'maxlength'=>128,'tl_class'=>'w50','gsIgnore'=>true),
            'save_callback' => array
            (
                array('prestep.bookingplan.room.dca.tl_prestep_bookingplan_room', 'generateAlias')
            )
        ),
        'description' => array
        (
            'label'                   => &$GLOBALS['TL_LANG'][ $strTableName ]['description'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'textarea',
            'eval'                    => array('rte'=>'tinyMCE','style'=>'height: 50px;','tl_class'=>'clr long','gsIgnore'=>true),
        ),
        'published' => array
        (
            'label'                   => &$GLOBALS['TL_LANG'][ $strTableName ]['published'],
            'exclude'                 => true,
            'filter'                  => true,
            'flag'                    => 1,
            'inputType'               => 'checkbox',
            'eval'                    => array('submitOnChange'=>true, 'doNotCopy'=>true),
        ),
        'start' => array
        (
            'label'                   => &$GLOBALS['TL_LANG'][ $strTableName ]['start'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
        ),
        'stop' => array
        (
            'label'                   => &$GLOBALS['TL_LANG'][ $strTableName ]['stop'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
        )
    )
);
