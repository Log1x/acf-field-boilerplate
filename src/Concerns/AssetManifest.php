<?php

namespace Log1x\AcfFieldBoilerplate\Concerns;

trait AssetManifest
{
    /**
     * The asset URI.
     *
     * @var string
     */
    protected $uri;

    /**
     * The asset path.
     *
     * @var string
     */
    protected $path;

    /**
     * The field type assets enqueued when rendering the field type.
     *
     * @return void
     */
    public function input_admin_enqueue_scripts()
    {
        $this->enqueue();
    }

    /**
     * The field type assets enqueued when creating a field group.
     *
     * @return void
     */
    public function field_group_admin_enqueue_scripts()
    {
        $this->enqueue();
    }

    /**
     * Enqueue the field type assets.
     *
     * @returrn void
     */
    protected function enqueue()
    {
        if (empty($this->assets)) {
            return;
        }

        foreach ($this->assets as $asset) {
            if (empty($type = pathinfo($asset, PATHINFO_EXTENSION))) {
                continue;
            }

            return $type === 'css' ? wp_enqueue_style(
                $this->name,
                $this->asset("public/css/{$asset}"),
                [],
                null
            ) : $type === 'js' ? wp_enqueue_script(
                $this->name,
                $this->asset("public/js/{$asset}"),
                ['acf-field'],
                null,
                true
            ) : null;
        }
    }

    /**
     * Resolve the URI for an asset using the manifest.
     *
     * @return string
     */
    public function asset($asset = '', $manifest = 'mix-manifest.json')
    {
        if (! file_exists($manifest = $this->path . $manifest)) {
            return $this->uri . $asset;
        }

        $manifest = json_decode(file_get_contents($manifest), true);

        return $this->uri . ($manifest[$asset] ?? $asset);
    }
}
