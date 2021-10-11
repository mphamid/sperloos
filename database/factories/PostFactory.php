<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws FileNotFoundException
     */
    public function definition()
    {
        $imageName = $this->resizeAndStoreImage(100, 100);

        return [
            'title' => $this->faker->text(50),
            'content' => $this->faker->randomHtml(),
            'thumbnail' => $imageName
        ];
    }

    /**
     * @return string
     */
    private function getRandomImageName(): string
    {
        do {
            $imageName = Str::random('10');
        } while ($this->getDisk()->exists($imageName));
        return $imageName;
    }

    /**
     * @return string
     */
    private function downloadRandomImage(): string
    {
        $imageName = $this->getRandomImageName();
        $imageUrl = 'https://picsum.photos/800/500?hmac=' . rand(00000, 99999);
        $imageContents = file_get_contents($imageUrl);
        $this->getDisk()->put('orginal/' . $imageName . '.jpg', $imageContents);
        return $imageName;
    }

    /**
     * @param $width
     * @param $height
     * @return string
     * @throws FileNotFoundException
     */
    private function resizeAndStoreImage($width, $height): string
    {
        $imageName = $this->downloadRandomImage();
        $img = Image::make($this->getDisk()->get('orginal/' . $imageName . '.jpg'));
        $img->resize($width, $height, function ($constraint) {
            $constraint->upsize();
        });
        $this->getDisk()->put($width . 'x' . $height . '_' . $imageName . '.jpg', (string)$img->encode('jpg', 100));
        return $imageName . '.jpg';
    }

    /**
     * @return Filesystem|FilesystemAdapter
     */
    private function getDisk()
    {
        return Storage::disk('public');
    }

}
