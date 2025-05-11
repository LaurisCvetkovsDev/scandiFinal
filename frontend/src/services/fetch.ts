import { ProductData } from "../types/ProductData";

const get_products = "http://localhost/scandiFinal/Backend/api/get_products.php";
const get_product = "http://localhost/scandiFinal/Backend/api/get_product.php";

export const fetchProducts = async (): Promise<ProductData[]> => {
  try {
    const response = await fetch(get_products);
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Fetch error:", error);
    return [];
  }
};

export const fetchProduct = async (id: string): Promise<ProductData | null> => {
  try {
    const response = await fetch(`${get_product}?id=${id}`);
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Fetch error:", error);
    return null;
  }
};
