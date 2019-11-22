import React, {useState} from 'react';

function App() {
  const [count, updateCount] = useState(1);
  return(
    <div>

      <p>This is react.<br/>To prove it, here's a stupid counter button with a value of <strong>{count}</strong></p>

      <button type="button" onClick={() => updateCount(count+1)}>
        {count}
      </button>
      
      {count >= 10 && <div><h2>Booooooring!</h2><p>Why don't you go to <strong>reactapp/src/App.js</strong> and start editing some code?</p></div>}
      
    </div>
  );
}

export default App;
