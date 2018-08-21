<?php

/*
 * This file is part of oui_twitch,
 * a oui_player v2+ extension to easily embed
 * Twitch customizable video players in Textpattern CMS.
 *
 * https://github.com/NicolasGraph/oui_twitch
 *
 * Copyright (C) 2018 Nicolas Morand
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA..
 */

/**
 * Twitch
 *
 * @package Oui\Player
 */

namespace Oui;

if (class_exists('Oui\Player\OEmbed')) {

    class Twitch extends Player\OEmbed
    {
        protected static $endPoint = 'https://api.twitch.tv/v4/oembed';
        protected static $URLBase = 'https://www.twitch.tv/';

        protected static $srcBase = '//player.twitch.tv/';
        protected static $srcGlue = array('?', '&amp;', '&amp;');
        protected static $iniDims = array(
            'width'      => '620',
            'height'     => '378',
            'ratio'      => '',
            'responsive' => array(
                'default' => 'false',
                'valid'   => array('true', 'false'),
            ),
        );
        protected static $iniParams = array(
            'autoplay' => array(
                'default' => 'true',
                'valid'   => array('true', 'false'),
            ),
            'muted'    => array(
                'default' => 'false',
                'valid'   => array('true', 'false'),
            ),
            'time'     => array(
                'default' => '',
                'valid'   => 'number',
            ),
        );
        protected static $mediaPatterns = array(
            'video' => array(
                'scheme' => '#^(https?://(www\.)?twitch\.tv/videos/([0-9]+))$#i',
                'id'     => '3',
                'prefix' => 'video=v',
            ),
            'channel' => array(
                'scheme' => '#^(https?:\/\/(www.)?twitch\.tv\/([^\&\?\/]+))$#i',
                'id'     => '3',
                'prefix' => 'channel=',
            ),
        );
    }
}
