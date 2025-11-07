<?php
require_once 'C:\laragon\www\praktikumPBO\Collection\collection.php';

class ArrayList implements ListInterface {
    private array $data = [];

    public function add($element): void {
        $this->data[] = $element;
    }

    public function get(int $index) {
        if (!isset($this->data[$index])) throw new OutOfBoundsException("Index $index tidak ditemukan");
        return $this->data[$index];
    }

    public function set(int $index, $element): void {
        if (!isset($this->data[$index])) throw new OutOfBoundsException("Index $index tidak ditemukan");
        $this->data[$index] = $element;
    }

    public function remove(int $index): void {
        if (!isset($this->data[$index])) throw new OutOfBoundsException("Index $index tidak ditemukan");
        array_splice($this->data, $index, 1);
    }

    public function indexOf($element): int|false {
        $i = array_search($element, $this->data, true);
        return $i === false ? false : $i;
    }

    public function addFirst($element): void {
        array_unshift($this->data, $element);
    }

    public function addLast($element): void {
        $this->add($element);
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
        return in_array($element, $this->data, true);
    }

    public function toArray(): array {
        return $this->data;
    }
}

// ===== MAIN TEST =====
$list = new ArrayList();
$list->add("Apel");
$list->add("Jeruk");
$list->add("Mangga");

echo "Isi awal:\n";
print_r($list->toArray());

$list->addFirst("Pisang");
$list->addLast("Melon");

echo "\nSetelah addFirst & addLast:\n";
print_r($list->toArray());

$list->remove(1);
echo "\nSetelah remove indeks 1:\n";
print_r($list->toArray());

echo "\nElemen indeks ke-2: " . $list->get(2) . "\n";
echo "Index dari 'Melon': " . $list->indexOf("Melon") . "\n";
echo "Ukuran list: " . $list->size() . "\n";
echo "Apakah kosong? " . ($list->isEmpty() ? "Ya" : "Tidak") . "\n";
?>
