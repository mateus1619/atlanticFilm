<?php

namespace Service\Enum;

/**
 * Content types to search
 */
enum ContentType: string
{
    case TYPE_ANIME = 'animes';

    case TYPE_MOVIE = 'filmes';

    case TYPE_SERIE = 'series';
}
