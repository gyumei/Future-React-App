import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './css/Ownpage.css'

const Ownpage = (props) => {
    const { ownpage } = props;
    const images = ownpage.images;
    console.log(ownpage.images);
    
    return (
<body>
    <div className="loose-leaf">
        <h1>タイムカプセル</h1>
        <div className="box5">
            <div className="sample_box3_2">
                
                <div className="fashionable-box3">
                    <p>{ ownpage.year }に公開されました。</p>
                </div>
                <div className="fashionable-box3">
                    <p>思い出の言葉:{ ownpage.content }</p>
                </div>
                
                
                {
                (
                   ()=> {
                        if(ownpage.images == null) {
                        } else {
                        return (
                        
                        <div>
                        
                            { images.map((image) => (
                                <div key={image.id}>
                                {image.extension == 'jpg' || image.extension == 'png' ? (
                                    <img src={ image.path } width="500px" height="300px"/>
                                    ) : (
                                    <video controls loop autoplay muted width="500px" height="300px">
                                        <source src={ image.path } type="video"></source>
                                    </video>
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
            
            </div>
        </div>
    </div>
    <div className="button019">
	  <Link href={`/future`}>戻る</Link>
	</div>
</body>
    );
}

export default Ownpage;