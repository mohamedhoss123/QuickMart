import { Button } from "./ui/button";
import { useState, useEffect } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { useInView } from "react-intersection-observer";

const images = [
    `${import.meta.env.VITE_MEDIA_PATH}/banners/banner-1.png`,
    `${import.meta.env.VITE_MEDIA_PATH}/banners/banner-1.png`,
    `${import.meta.env.VITE_MEDIA_PATH}/banners/banner-1.png`
];

export default function HeroSection() {
    const [index, setIndex] = useState(0);
    const [direction, setDirection] = useState(1);
    const [hasViewed, setHasViewed] = useState(false);
    const { ref, inView } = useInView({ triggerOnce: true, threshold: 0.5 });

    useEffect(() => {
        if (inView && !hasViewed) {
            setHasViewed(true);
        }
    }, [inView, hasViewed]);

    useEffect(() => {
        if (!hasViewed) return;
        const interval = setInterval(() => {
            setDirection(1);
            setIndex((prevIndex) => (prevIndex + 1) % images.length);
        }, 3000);

        return () => clearInterval(interval);
    }, [hasViewed]);

    return (
        <section ref={ref} className="flex flex-col items-center justify-center w-full mt-7">
            <div className="grid grid-cols-3 grid-rows-5 gap-4">
                <div className="col-span-2 row-span-5 relative flex items-center overflow-hidden">
                    <div className="absolute left-0 py-5 px-10 space-y-4 z-10">
                        <div className="space-y-4">
                            <p className="text-[#0BAF9A] text-[16px]">ORGANIC</p>
                            <h2 className="text-[#222222] text-[45px] font-bold">100% Fresh</h2>
                            <p className="text-[#4A5568] text-[32px]">Fruit & Vegetables</p>
                            <p className="text-[#4A5568] w-[281px] text-[16px]">
                                Free shipping on all your order. We deliver, you enjoy.
                            </p>
                        </div>
                        <Button className="bg-[#0BAF9A] text-white w-[100px] h-[45px] hover:bg-[#0BAF9A]/90">
                            Shop Now
                        </Button>
                    </div>
                    <div className="absolute inset-0 w-full h-full flex overflow-hidden">
                        <AnimatePresence custom={direction} mode="popLayout">
                            <motion.img
                                key={index}
                                src={images[index]}
                                alt="banner"
                                className="w-full h-full object-cover rounded-[10px] select-none absolute"
                                draggable={false}
                                initial={{ x: direction * 100 + "%", opacity: 0.5 }}
                                animate={{ x: "0%", opacity: 1 }}
                                exit={{ x: -direction * 100 + "%", opacity: 0.5 }}
                                transition={{ duration: 0.4, ease: "easeInOut" }}
                            />
                        </AnimatePresence>
                    </div>
                    <div className="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                        {images.map((_, i) => (
                            <div
                                key={i}
                                className={`w-3 h-3 rounded-full ${i === index ? "bg-[#0BAF9A]" : "bg-gray-400"}`}
                            />
                        ))}
                    </div>
                </div>
                <div className="row-span-5 col-start-3">
                    <img
                        src={`${import.meta.env.VITE_MEDIA_PATH}/banners/banner-2.png`}
                        alt="banner-2"
                        className="rounded-[10px] select-none"
                        draggable={false}
                    />
                </div>
            </div>
        </section>
    );
}