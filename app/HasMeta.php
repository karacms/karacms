<?php
namespace App;

trait HasMeta
{
    /**
     * Get/Set the field or meta data
     *
     * @param String $field Field name
     * @param mixed $value, if null then get the field or meta data, otherwise set the field or meta data
     *
     * @return mixed
     */
    public function data($field, $value = null)
    {
        if (is_null($value)) {
            if (in_array($field, $this->getFillable()) && isset($this->$field)) {
                return $this->$field;
            }

            if (isset($this->meta[$field])) {
                return $this->meta[$field];
            }

            return $value;
        }

        if (in_array($field, $this->getFillable())) {
            $this->$field = $value;

            return $this->save();
        }

        return $this->meta[$field] = $value;
    }

    public function generateDataWithMeta($data)
    {
        $meta = $data['meta'] ?? [];

        foreach ($data as $key => $value) {
            if (!in_array($key, $this->getFillable()) && !in_array($key, $this->getGuarded()) && !in_array($key, $this->getDates())) {
                $meta[$key] = $value;
            }
        }

        $data['meta'] = json_encode($meta);

        return $data;
    }

    public function updateWithMeta($data)
    {
        $data = $this->generateDataWithMeta($data);

        return $this->update($data);
    }

    public static function createWithMeta($data)
    {
        $model  = new self;
        $data = $model->generateDataWithMeta($data);

        return self::create($data);
    }

    /**
     * Override create() method, allows user pass any attributes as meta field
     *
     * @return Model
     */
    public static function create(array $attributes = [])
    {
        $model = new self;
        $data = $model->generateDataWithMeta($attributes);

        return static::query()->create($data);
    }

    public function __get($key)
    {
        $value = $this->getAttribute($key);

        if (!is_null($value)) {
            return $value;
        }

        $meta = $this->getAttribute('meta');

        if (is_array($meta) && isset($meta[$key])) {
            return $meta[$key];
        }

        return null;
    }

    public function __set($key, $value)
    {
        if (!in_array($key, $this->getFillable()) && !in_array($key, $this->getGuarded()) && !in_array($key, $this->getDates()) && $key !== 'meta') {
            $meta = $this->getAttribute('meta');

            if (is_null($meta)) {
                $meta = [];
            }

            $meta[$key] = $value;

            $this->setAttribute('meta', json_encode($meta));
        } else {
            $this->setAttribute($key, $value);
        }
    }
}
