import * as React from 'react';
import { useNavigation } from '@react-navigation/native';
import { StackHeaderLeftButtonProps } from '@react-navigation/stack';
import { StyleSheet, Button } from 'react-native';
import { Text, View } from '../components/Themed';
import MenuIcon from '../components/MenuIcon';
import { useEffect } from 'react';
import main from '../styles/main';

export default function SessionRecordingScreen() {
  const navigation = useNavigation();
  const [counter, setCounter] = React.useState({
    h: 0,
    m: 0,
    s: 0
  });
  const styles = StyleSheet.create({
    item: {
      backgroundColor: '#bfcfff',
      padding: 20,
      marginVertical: 8,
      marginHorizontal: 16,
    },
    title: {
      fontSize: 36,
    },
    contentText: {
      fontSize: 24
    },
  });

  const timerHandler = () => {
    const newCounter = JSON.parse(JSON.stringify(counter));
    newCounter.s++;

    if (newCounter.s === 60) {
      newCounter.s = 0;
      newCounter.m++;
    }

    if (newCounter.m === 60) {
      newCounter.m = 0;
      newCounter.h++;
    }

    setCounter(newCounter);
  }

  useEffect(() => {
    navigation.setOptions({
      headerLeft: (props: StackHeaderLeftButtonProps) => (<MenuIcon/>)
    });
    const interval = setInterval(timerHandler, 1000);

    return () => {
      clearInterval(interval);
    }
  });

  const parseNumber = nb => {
    if (nb < 10) return '0' + nb;
    else return nb;
  }

  return (
    <View style={main.centered}>
      <View style={styles.item}>
        <Text style={styles.title}>{parseNumber(counter.h)}:{parseNumber(counter.m)}:{parseNumber(counter.s)}</Text>
        <Text style={styles.contentText}>Recording in progress ...</Text>
        <br/>
        <Button
          onPress={() =>{navigation.navigate("My sessions");}}
          title="Stop the session"
          color="#0000ff"
          accessibilityLabel="Stop the session"
        />
      </View>
    </View>
  )
};