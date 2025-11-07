<?php
require_once 'C:\laragon\www\praktikumPBO\Collection\collection.php';

class HashMap implements MapInterface {
    private array $data = [];

    public function put($key, $value): void {
        $this->data[$key] = $value;
    }

    public function get($key) {
        return $this->data[$key] ?? null;
    }

    public function remove($key): bool {
        if ($this->containsKey($key)) {
            unset($this->data[$key]);
            return true;
        }
        return false;
    }

    public function containsKey($key): bool {
        return array_key_exists($key, $this->data);
    }

    public function containsValue($value): bool {
        return in_array($value, $this->data, true);
    }

    public function keys(): array {
        return array_keys($this->data);
    }

    public function values(): array {
        return array_values($this->data);
    }

    public function size(): int {
        return count($this->data);
    }

    public function isEmpty(): bool {
        return empty($this->data);
    }

    public function clear(): void {
        $this->data = [];
    }

    public function contains($element): bool {
        return $this->containsValue($element);
    }

    public function toArray(): array {
        return $this->data;
    }
}

// ======== MAIN TEST =========
$map = new HashMap();

$map->put("id", 101);
$map->put("nama", "Laff");
$map->put("jurusan", "Teknik Komputer");

echo "Isi awal HashMap:\n";
print_r($map->toArray());

echo "\nNilai dari key 'nama': " . $map->get("nama") . "\n";

$map->put("nama", "Rizky");
echo "\nSetelah update key 'nama':\n";
print_r($map->toArray());

$map->remove("jurusan");
echo "\nSetelah remove key 'jurusan':\n";
print_r($map->toArray());

echo "\nKeys: ";
print_r($map->keys());

echo "Values: ";
print_r($map->values());

echo "\nUkuran map: " . $map->size() . "\n";
echo "Apakah map kosong? " . ($map->isEmpty() ? "Ya" : "Tidak") . "\n";
?>
