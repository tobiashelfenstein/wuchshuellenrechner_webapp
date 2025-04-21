export class Tube {
    // indicates the selected tube type
    // key value pair: "mk" and "MK-Wuchshülle"
    type: string[] = [];

    // costs of a single tube
    // unit: price per piece in users currency
    // example: 5.50
    cost: number = 0;

    // costs of accessories like staff or cable tie for a single tube
    // unit: price per piece in users currency
    // example: 1.50
    accessories: number = 0;

    // sum of needed time for transportation
    // unit: number of hours
    // example: 3.50
    transportation: number = 0;

    // capacity per hour for assembly of tubes
    // unit: piece per hour
    // example: 40
    assembly: number = 0;

    // sum of maintenance cost for the full protection area
    // unit: price per year in users currency
    // example: 500.00
    maintenance: number = 0;

    // estimated costs for disassembly of all tubes
    // unit: price in users currency
    // example: 1250.00
    disassembly: number = 0;

    // estimated cost for garbage disposal
    // unit: price in users currency
    // example: 120.00
    garbage: number = 0;

    // constructor for this class
    constructor() {}

    // calculate the sum of all costs for one tube
    // costs per unit, thats why number of plants and price per hour is needed

    // TODO: some properties are 0!!!
    
    getSumOfCostsPerTube(plantNumber: number, hourlyWage: number): number
    {
        var sum: number = 0;

        // first sum up costs per tube and its accessories
        sum = this.cost + this.accessories;

        // add costs for transportation per plant
        sum = sum + (this.transportation * hourlyWage) / plantNumber;

        // add costs for assembly of tubes per plant
        sum = sum + hourlyWage / this.assembly;

        // costs for maintenance the full protection area per plant
        // in future maintenance multiplied with number of years
        sum = sum + this.maintenance / plantNumber;

        // simplify calculation for disassemlby and garbage disposal
        sum = sum + (this.disassembly + this.garbage) / plantNumber;

        return sum;
    }
}
