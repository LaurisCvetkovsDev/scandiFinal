import { useEffect } from "react";
import { useDataStore } from "../store";
import { Link } from "react-router-dom";

interface ProductGridProps {
  category?: string;
  showAddToCart?: boolean;
}

const ProductGrid = ({ category }: ProductGridProps) => {
  const products = useDataStore((state) => state.products);
  const setProducts = useDataStore((state) => state.setAllProducts);

  useEffect(() => {
    setProducts();
  }, []);

  const filtered = category
    ? products.filter(
        (product) =>
          product.category.name.toLowerCase() === category.toLowerCase()
      )
    : products;

  return (
    <div className="bg-dark text-white p-4 Grid">
      <div className="text-center">
        <div className="row row-cols-2 continer">
          {filtered.map((item) => (
            <div key={item.id} className="col border p-3 g-3">
              <Link
                to={`/Detail/${item.id}`}
                className="no-underline text-white d-block"
              >
                <p>{item.name}</p>
                <div className={item.inStock ? "" : "out-of-stock-container"}>
                  <img
                    className="img-fluid w-100"
                    src={item.gallery[0]?.url}
                    alt={item.name}
                  />
                  {!item.inStock && (
                    <div className="out-of-stock-text">OUT OF STOCK</div>
                  )}
                </div>
                <p className="no-underline text-white m-0">
                  {item.prices[0]?.amount} {item.prices[0]?.currencySymbol}
                </p>
              </Link>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default ProductGrid;
