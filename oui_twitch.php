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

namespace Oui\Player {

    if (class_exists('Oui\Player\Provider')) {

        class Twitch extends Provider
        {
            protected static $patterns = array(
                'video' => array(
                    'scheme' => '#^((http|https)://(www\.)?twitch\.tv/videos/([0-9]+))$#i',
                    'id'     => '4',
                    'prefix' => 'video=v',
                ),
                'channel' => array(
                    'scheme' => '#^((http|https):\/\/(www.)?twitch\.tv\/([^\&\?\/]+))$#i',
                    'id'     => '4',
                    'prefix' => 'channel=',
                ),
            );
            protected static $src = '//player.twitch.tv/';
            protected static $glue = array('?', '&amp;', '&amp;');
            protected static $params = array(
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
        }
    }
}

namespace {
    function oui_twitch($atts) {
        return oui_player(array_merge(array('provider' => 'twitch'), $atts));
    }

    function oui_if_twitch($atts, $thing) {
        return oui_if_player(array_merge(array('provider' => 'twitch'), $atts), $thing);
    }
}
