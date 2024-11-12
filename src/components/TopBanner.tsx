import Image from "next/image";

const TopBanner = () => {
  return (
    <div className="flex flex-col md:flex-row w-full items-center mt-32 md:mt-0 gap-10 lg:pl-[130px]">
      <div className=" w-3/5 gap-10 flex flex-col md:-mt-40 text-left ">
        <h1 className=" font-semibold text-5xl leading-[54px] w-[700px]">
          Join the future of vision: Connect, Learn,and Innovate with the
          <span className="text-[#4B92D4] "> Computer Vision Africa</span>
        </h1>
        <p className="text-[#D97A66] text-base md:w-[592px] leading-6 ">
          Steps into the world of cutting-edge technology with a vibrant
          community of computer vision enthusiasts, experts and learners.
          Whether you’re diving into AI-driven image analysis or exploring new
          advancements in machine learning, our community offers a collaborative
          space to grow, share knowledge, and transform ideas into ground
          breaking solutions. Get access to resources, tutorials, and industry
          insights to elevate your skills and make a real impact in the world of
          computer vision.
        </p>
      </div>
      <div className="w-2/5 h-[877px] flex overflow-hidden">
        <Image
          src="/bannerImg.png"
          alt=""
          width={500}
          height={500}
          className="w-[100rem] h-[600px] md:h-[700px]  md:w-[90rem] -mt-8"
        />
      </div>
    </div>
  );
};

export default TopBanner;
