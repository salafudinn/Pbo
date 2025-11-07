<?php
require_once 'C:\laragon\www\praktikumPBO\Collection\collection.php';

class Node {
    public $data;
    public ?Node $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList implements ListInterface {
    private ?Node $head = null;
    private int $size = 0;

    public function add($element): void {
        $node = new Node($element);
        if ($this->head === null) {
            $this->head = $node;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $node;
        }
        $this->size++;
    }

    public function addFirst($element): void {
        $node = new Node($element);
        $node->next = $this->head;
        $this->head = $node;
        $this->size++;
    }

    public function addLast($element): void {
        $this->add($element);
    }

    public function get(int $index) {
        $current = $this->head;
        $count = 0;
        while ($current !== null) {
            if ($count === $index) return $current->data;
            $current = $current->next;
            $count++;
        }
        return null;
    }

    public function set(int $index, $element): void {
        $current = $this->head;
        $count = 0;
        while ($current !== null) {
            if ($count === $index) {
                $current->data = $element;
                return;
            }
            $current = $current->next;
            $count++;
        }
    }

    public function remove(int $index): void {
        if ($this->head === null) return;

        if ($index === 0) {
            $this->head = $this->head->next;
            $this->size--;
            return;
        }

        $current = $this->head;
        $prev = null;
        $count = 0;

        while ($current !== null && $count < $index) {
            $prev = $current;
            $current = $current->next;
            $count++;
        }

        if ($current !== null) {
            $prev->next = $current->next;
            $this->size--;
        }
    }

    public function indexOf($element): int|false {
        $current = $this->head;
        $index = 0;
        while ($current !== null) {
            if ($current->data === $element) return $index;
            $current = $current->next;
            $index++;
        }
        return false;
    }

    public function size(): int {
        return $this->size;
    }

    public function isEmpty(): bool {
        return $this->size === 0;
    }

    public function clear(): void {
        $this->head = null;
        $this->size = 0;
    }

    public function contains($element): bool {
        return $this->indexOf($element) !== false;
    }

    public function toArray(): array {
        $result = [];
        $current = $this->head;
        while ($current !== null) {
            $result[] = $current->data;
            $current = $current->next;
        }
        return $result;
    }
}

// ======== MAIN TEST =========
$list = new LinkedList();
$list->add("Apel");
$list->add("Jeruk");
$list->add("Mangga");

echo "Isi awal:\n";
print_r($list->toArray());

$list->addFirst("Pisang");
$list->addLast("Melon");

echo "\nSetelah addFirst & addLast:\n";
print_r($list->toArray());

$list->remove(2);
echo "\nSetelah remove indeks ke-2:\n";
print_r($list->toArray());

echo "\nIndex dari 'Melon': " . $list->indexOf("Melon") . "\n";
echo "Ukuran list: " . $list->size() . "\n";
echo "Apakah list kosong? " . ($list->isEmpty() ? "Ya" : "Tidak") . "\n";
?>
