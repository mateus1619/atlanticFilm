<?php

namespace Service\Util;

use Ramsey\Uuid\Uuid;

class GenerateBase64ToGetMovieFile
{
    /**
     * Method to generate Base64 hash to send API to get movie file
     *
     * @param integer $video_id
     * @param string $video_content_type
     * @return string
     */
    public static function generateHash(int $video_id, string $video_content_type): string
    {
        $data = json_encode([
            'app_package' => 'com.doramaslove.corp',
            'device_id' => Uuid::uuid4(),
            'salt' => '618',
            'sign' => 'a03100d69f590471030e6effdec9c6a1',
            'page' => 'episodio',
            'action_type' => 'PLAY',
            'id' => sprintf('%d', $video_id),
            'type' => $video_content_type === 'movie' ? 'a' : 'e'
        ]);

        return rawurlencode(base64_encode($data));
    }
}
