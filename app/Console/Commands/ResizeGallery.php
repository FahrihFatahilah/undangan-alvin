<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ResizeGallery extends Command
{
    protected $signature = 'gallery:resize';
    protected $description = 'Resize gallery images for web';

    public function handle()
    {
        $source = public_path('images/gallery');
        $thumbDir = public_path('images/gallery/thumbs');

        if (!is_dir($thumbDir)) mkdir($thumbDir, 0755, true);

        foreach (glob("$source/*.jpg") as $file) {
            $name = basename($file);
            $output = "$thumbDir/$name";

            if (file_exists($output)) {
                $this->line("Skip: $name");
                continue;
            }

            $img = imagecreatefromjpeg($file);
            $w = imagesx($img);
            $h = imagesy($img);

            $newW = 800;
            $newH = (int)($h * ($newW / $w));

            $resized = imagecreatetruecolor($newW, $newH);
            imagecopyresampled($resized, $img, 0, 0, 0, 0, $newW, $newH, $w, $h);
            imagejpeg($resized, $output, 75);

            imagedestroy($img);
            imagedestroy($resized);

            $oldSize = round(filesize($file) / 1024 / 1024, 1);
            $newSize = round(filesize($output) / 1024, 0);
            $this->info("$name: {$oldSize}MB -> {$newSize}KB");
        }

        $this->info('Done!');
    }
}
