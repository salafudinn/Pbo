<?php
require_once 'C:\laragon\www\praktikumPBO\Collection\collection.php';

class Stack implements StackInterface {
    private array $items = [];

    public function push($element): void {
        $this->items[] = $element;
    }

    public function pop() {
        if ($this->isEmpty()) {
            return null;
        }
        return array_pop($this->items);
    }

    public function peek() {
        if ($this->isEmpty()) {
            return null;
        }
        return end($this->items);
    }

    public function size(): int {
        return count($this->items);
    }

    public function isEmpty(): bool {
        return empty($this->items);
    }

    public function clear(): void {
        $this->items = [];
    }

    public function contains($element): bool {
        return in_array($element, $this->items, true);
    }

    public function toArray(): array {
        return $this->items;
    }
}

// ======== MAIN TEST =========
$stack = new Stack();

$stack->push("Apel");
$stack->push("Jeruk");
$stack->push("Mangga");

echo "Isi stack:\n";
print_r($stack->toArray());

echo "\nElemen teratas (peek): " . $stack->peek() . "\n";

$stack->pop();
echo "\nSetelah pop satu elemen:\n";
print_r($stack->toArray());

echo "\nUkuran stack: " . $stack->size() . "\n";
echo "Apakah stack kosong? " . ($stack->isEmpty() ? "Ya" : "Tidak") . "\n";
?>
