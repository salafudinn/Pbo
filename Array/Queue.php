<?php
require_once 'C:\laragon\www\praktikumPBO\Collection\collection.php';

class Queue implements QueueInterface {
    private array $items = [];

    public function enqueue($element): void {
        $this->items[] = $element;
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return null;
        }
        return array_shift($this->items);
    }

    public function peek() {
        if ($this->isEmpty()) {
            return null;
        }
        return $this->items[0];
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
$queue = new Queue();

$queue->enqueue("Apel");
$queue->enqueue("Jeruk");
$queue->enqueue("Mangga");

echo "Isi antrian:\n";
print_r($queue->toArray());

echo "\nElemen pertama (peek): " . $queue->peek() . "\n";

$queue->dequeue();
echo "\nSetelah dequeue satu elemen:\n";
print_r($queue->toArray());

echo "\nUkuran antrian: " . $queue->size() . "\n";
echo "Apakah antrian kosong? " . ($queue->isEmpty() ? "Ya" : "Tidak") . "\n";
?>
