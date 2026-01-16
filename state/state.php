class state {
    public $name;
    public $abbreviation;
    public $capital;
    public $population;

    public function __construct($name, $abbreviation, $capital, $population) {
        $this->name = $name;
        $this->abbreviation = $abbreviation;
        $this->capital = $capital;
        $this->population = $population;
    }

    public function getInfo() {
        return "State: {$this->name} ({$this->abbreviation}), Capital: {$this->capital}, Population: {$this->population}";
    }
}