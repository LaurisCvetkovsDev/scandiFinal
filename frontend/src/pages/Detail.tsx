import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { useDataStore } from "../store";
import { ProductData } from "../types/ProductData";

const Detail = () => {
  const params = useParams();
  const { id } = params;
  const product = useDataStore((state) => state.product);
  const setProduct = useDataStore((state) => state.setProduct);
  const addToCart = useDataStore((state) => state.addToCart);
  const [selectedItems, setSelectedItem] = useState(0);
  const [selectedAttributes, setSelectedAttributes] = useState<{
    [key: string]: string;
  }>({});

  useEffect(() => {
    if (id) {
      setProduct(id);
    }
  }, [id, setProduct]);

  if (!product) {
    return <div>Loading...</div>;
  }

  const handleSelect = (attrName: string, itemId: string) => {
    setSelectedAttributes((prev) => ({
      ...prev,
      [attrName]: itemId,
    }));
  };

  const setToCartItem = (): ProductData => {
    const filteredAttributes = product.attributes
      .filter((attr) => selectedAttributes[attr.name])
      .map((attr) => ({
        name: attr.name,
        type: attr.type,
        items: attr.items.filter(
          (item) => item.id === selectedAttributes[attr.name]
        ),
      }));

    const toCartItem: ProductData = {
      id: product.id,
      name: product.name,
      description: product.description,
      inStock: product.inStock,
      category: product.category,
      prices: product.prices,
      gallery: product.gallery,
      attributes: filteredAttributes,
    };

    return toCartItem;
  };

  return (
    <div className="detail-container">
      <div className="row align-items-start justify-content-center">
        <div
          className="col-1 overflow-auto detail-gallery-thumbs"
          style={{ maxHeight: "600px" }}
        >
          {product.gallery.map((item, index) => (
            <div key={index} className="mb-2">
              <a
                href="#"
                onClick={(e) => {
                  e.preventDefault();
                  setSelectedItem(index);
                }}
              >
                <img
                  src={item.url}
                  alt={`Thumbnail ${index}`}
                  className="img-fluid"
                />
              </a>
            </div>
          ))}
        </div>

        <div className="col-5">
          <img
            src={product.gallery[selectedItems]?.url}
            alt="Selected"
            className="img-fluid height-50 width-auto m-3"
          />
        </div>

        <div className="col">
          <h1>{product.name}</h1>

          {product.attributes.map((attribute) => (
            <div key={attribute.name} className="mb-3">
              <p>{attribute.name}</p>
              <div className="d-flex flex-wrap gap-2">
                {attribute.items.map((item) => {
                  const isSelected =
                    selectedAttributes[attribute.name] === item.id;
                  const isColor = attribute.name.toLowerCase() === "color";

                  return (
                    <button
                      key={item.id}
                      onClick={() => handleSelect(attribute.name, item.id)}
                      className={`btn ${
                        isColor
                          ? ""
                          : isSelected
                          ? "btn-dark"
                          : "btn-warning text-white"
                      }`}
                      style={{
                        backgroundColor: isColor ? item.value : undefined,
                        border:
                          isColor && isSelected
                            ? "3px solid black"
                            : "1px solid #ccc",
                        width: isColor ? "40px" : undefined,
                        height: isColor ? "40px" : undefined,
                      }}
                    >
                      {isColor ? "" : item.value}
                    </button>
                  );
                })}
              </div>
            </div>
          ))}

          <p>Price:</p>
          <h3>
            {product.prices.map((item, index) => (
              <div className="d-flex flex-row" key={index}>
                <h3>{item.amount}</h3>
                <h3>{item.currencySymbol}</h3>
              </div>
            ))}
          </h3>

          <button
            className="btn btn-primary p-3 width-10 m-top-5"
            onClick={() => addToCart(setToCartItem())}
          >
            Add to cart
          </button>

          <div
            className="p-2"
            dangerouslySetInnerHTML={{ __html: product.description }}
          />
        </div>
      </div>
    </div>
  );
};

export default Detail;
