import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './css/Ownpage.css'
import './css/All.css'
import ReactPlayer from 'react-player'

const Ownpage = (props) => {
    const { ownpage } = props;
    const images = ownpage.images;
    console.log(ownpage.images);
    
    return (
<body>
    <div className="loose-leaf">
        <div className="loose-leaf-title">
            <h1>タイムカプセル</h1>
        </div>
            <div className="loose-leaf_2">
                <div className="loose-leaf_3">
                    <p>{ ownpage.year }に公開されました。</p>
                </div>
                <div className="loose-leaf_4">
                    <p>思い出の言葉</p>
                    <p>{ownpage.content }</p>
                </div>
                {
                (
                   ()=> {
                        {/* 画像があるかないかの場合分け */}
                        if(ownpage.images == null) {
                        } else {
                        return (
                        <div className="image-content">
                            { images.map((image) => (
                                <div key={image.id}>
                                {image.extension == 'jpg' || image.extension == 'png' || image.extension == 'jpeg' || image.extension == 'gif'? (
                                    <img src={ image.path } width="500px" height="300px"/>
                                    ) : (
                                    <ReactPlayer url={ image.path } id="MainPlay" playing loop controls={true} width="500px" height="300px"/>
                                )}
                                </div>
                                )) }
                        </div>
                         )
                        }
                        }
                    )
                ()
            }
            <div className="back-to-index">
                <Link href={`/future`}>戻る</Link>
	        </div>
        </div>
    </div>
</body>
    );
}

export default Ownpage;