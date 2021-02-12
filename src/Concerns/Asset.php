<?php

namespace Log1x\AcfExampleField\Concerns;

trait Asset
{
    /**
     * Resolve an asset URI from Laravel Mix's manifest.
     *
     * @param  string $asset
     * @return string
     */
    public function asset($asset = null, $path = 'public')
    {
        if (! file_exists($manifest = $this->path . 'public/mix-manifest.json')) {
            return $this->uri . $path . $asset;
        }

        $manifest = json_decode(file_get_contents($manifest), true);

        return $this->uri . $path . ($manifest[$asset] ?? $asset);
    }
}
