export type ProductData = {
    id: string;
    name: string;
    description: string;
    inStock: boolean;
    category: {
      id: string;
      name: string;
    };
    prices: {
      currencyLabel: string;
      currencySymbol: string;
      amount: number;
    }[];
    gallery: {
      url: string;
    }[];
    attributes: {
      name: string;
      type: string;
      items: {
        id: string;
        value: string;
        displayValue?: string;
      }[];
    }[];
  };
  